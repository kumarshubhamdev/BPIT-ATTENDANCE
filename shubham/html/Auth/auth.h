#ifndef __AUTH__
#define __AUTH__

#ifndef _MATH_H_
#include <math.h>
#endif

#ifndef _STDBOOL_H
#include <stdbool.h>
#endif

#define ld long double
#define pwr2(x) (x * x)

ld
sq_root(ld x);

ld
toRadians( ld degree );

ld
orthodromic_distance(ld stu_lat, ld stu_long, ld teach_lat, ld teach_long);

bool
check_range(ld dist);

#endif // __AUTH__
