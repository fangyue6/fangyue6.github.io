#include <sys/types.h>
#include <unistd.h>
#include <stdlib.h>
#include <stdio.h>
#include <string.h>
/*方法三，调用C库函数,*/  
char* join(char *s1, char *s2)  
{  
    char *result = malloc(strlen(s1)+strlen(s2)+1);//+1 for the zero-terminator  
    //in real code you would check for errors in malloc here  
    if (result == NULL) exit (1);  
  
    strcpy(result, s1);  
    strcat(result, s2);  
  
    return result;  
}
char* readfile(char* file){
	 FILE * fp;  
	 char * allline="";
     char * line = NULL;  
     size_t len = 0;  
     ssize_t read;  
  
     fp = fopen(file, "r");  
     if (fp == NULL)  
         exit(EXIT_FAILURE);  
  
     while ((read = getline(&line, &len, fp)) != -1) {  
         //printf("Retrieved line of length %zu :\n", read);  
         //printf("%s", line);
         //strcat(allline,line)  ;
     	allline=join(allline,line);
     	//allline=allline+line;
     }  
     fclose(fp);
     return allline;
     /*if (line)  
         free(line);  
     exit(EXIT_SUCCESS); */
}

char* getResult(char* command , int size){
	FILE   *stream;
	FILE   *wstream;
	char* tempfile="temp.txt";
	//char* command="ls -l";
	char   buf[size];

	memset( buf, '\0', sizeof(buf) );//初始化buf,以免后面写如乱码到文件中
	stream = popen( command, "r" ); //将“ls －l”命令的输出 通过管道读取（“r”参数）到FILE* stream
	wstream = fopen( tempfile, "w+"); //新建一个可写的文件

	fread( buf, sizeof(char), sizeof(buf), stream); //将刚刚FILE* stream的数据流读取到buf中
	fwrite( buf, 1, sizeof(buf), wstream );//将buf中的数据写到FILE    *wstream对应的流中，也是写到文件中

	pclose( stream );  
	fclose( wstream );
	return readfile(tempfile);
	//printf("%s",readfile("test_popen.txt"));
}
int main( void )
{
	printf("%s",getResult("./hello.sh",1024*1024*2));
	//getResult("./hello.sh");
return 0;
}   