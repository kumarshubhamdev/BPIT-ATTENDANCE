#include "auth.h"


ld
toRadians(ld degree){
    ld one_deg = (M_PI)/180;
    return (one_deg * degree);
}

ld
sq_root(ld value){
    ld err = 1e-10;

    ld ans = 0;
    ld low = 0 , high = 0;

	if(value < 1){
		low = value , high = 1;
	}
	else{
		low = 1 , high = value;
	}

    for(int i = 1 ; i <= 67 ; i++ ){

        ld mid = low + (high - low)/2.0;

        if( mid*mid <= value ){
            ans = mid;
            low = mid + err;
        }
        else{
            high = mid - err;
        }
    }

    return ans;
}

ld
orthodromic_distance(ld stu_lat,ld stu_long,ld teach_lat,ld teach_long){
    stu_lat = toRadians(stu_lat);
    stu_long = toRadians(stu_long);
    teach_lat = toRadians(teach_lat);
    teach_long = toRadians(teach_long);

    ld diff_lat = teach_lat - stu_lat;
    ld diff_long = teach_long - stu_long;

    ld ans = pwr2(sin(diff_lat/2)) +
                cos(stu_lat) * cos(teach_lat) *
                pwr2(sin(diff_long/2));

    ans = 2 * asin(sq_root(ans));


    // Radius of Earth in
    // Kilometers, R = 6371
    // Use R = 3956 for miles
    ld R = 6371;

	//ans in meter...
    ans = ans * R * (ld)1000;
    return ans;
}

bool
check_range(ld dist){
    //better implementation for future....
    return dist <= (ld)100;
}
