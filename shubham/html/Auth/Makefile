TARGET: auth_exe
auth_exe: auth.o main.o
	gcc auth.o main.o -o auth_exe `mysql_config --cflags --libs` -lm
auth.o: auth.c
	gcc -c auth.c -o auth.o
main.o: main.c
	gcc -c main.c -o main.o `mysql_config --cflags --libs`
clean:
	rm auth.o
	rm main.o
