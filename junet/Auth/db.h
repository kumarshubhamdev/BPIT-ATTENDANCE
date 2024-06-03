#ifndef __DB_H_
#define __DB_H_

#include <mysql.h>

#ifndef __STDIO_H
#include <stdio.h>
#endif

#ifndef __STDLIB_H
#include <stdlib.h>
#endif

#ifndef __STRING_H
#include <string.h>
#endif

#ifndef __STDARG_H
#include <stdarg.h>
#endif

void
connect_to_db(char db[],MYSQL *con);

void
retrieve_table(char table[],MYSQL *con);

MYSQL_RES *
extract_table(MYSQL *con);

int
num_of_entries(MYSQL_RES *result_table);

#define ITERATE_TABLE(row,result) { \
	while( (row = mysql_fetch_row(result) ) ) {

#define ITERATE_TABLE_END }}



#endif
