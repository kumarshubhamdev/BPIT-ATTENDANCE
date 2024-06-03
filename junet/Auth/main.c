#include<stdio.h>
#include<stdlib.h>
#include <string.h>
#include<mysql.h>
#include "auth.h"

void
error_found(MYSQL *con){
	printf("%s\n",mysql_error(con));
	mysql_close(con);
}

int
main(int argv , char **argc){
	//Pass the Teacher latitude and longitude from command line argument.
   	//Teacher latitude and longitude...
  	ld teach_lat = strtold(argc[1],NULL) , teach_long = strtold(argc[2],NULL);
	
	MYSQL *con = mysql_init(NULL);


	if( con == NULL ){
		printf("mysql_init() failed\n");
		return 0;
    	}
	
	if( mysql_real_connect(con,"localhost","usr","admin@1224"
			,"bpitattendance", 0,NULL,0) == NULL ){
		error_found(con);
	}

	if( mysql_query(con, "SELECT * FROM attendance") ){
		error_found(con);
	}

	MYSQL_RES *result = mysql_store_result(con);

	if( result == NULL ){
		error_found(con);
	}

	int num_fields = mysql_num_fields(result);

	MYSQL_ROW row;
	
	int enroll = 0;
	long double stu_lat = 0 , stu_long = 0;
	long double dist = 0;
	char en_num[15];
	char query[150]="";

	while( (row = mysql_fetch_row(result) ) ){
		
		enroll = (int)strtoll(row[0],NULL,10);
		stu_lat = strtold(row[1],NULL);
		stu_long = strtold(row[2],NULL);
		
		strcpy(query,"");
		sprintf(en_num,"%d",enroll);
		dist = orthodromic_distance(stu_lat,stu_long,teach_lat,teach_long);
		if( check_range(dist) ){
			strcat(query,"UPDATE attendance SET is_present = true WHERE enroll_num =");
			strcat(query,en_num);
			strcat(query,";");
			if( mysql_query(con, query ) ){
				error_found(con);
			}
			printf("%ld is present\n",enroll);
		}
		else{
			strcat(query,"UPDATE attendance SET is_present = false WHERE enroll_num =");
			strcat(query,en_num);
			strcat(query,";");
			if( mysql_query(con,query ) ){
				error_found(con);
			}
			printf("%ld is absent\n",enroll);
		}

	}

	mysql_free_result(result);
	mysql_close(con);


    	return 0;
}
