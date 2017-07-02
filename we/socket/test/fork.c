/*#include<stdio.h>    
#include<string.h>    
#include<stdlib.h>    
#include<unistd.h>    
int main()    
{    
    int  num=11;    
    pid_t pid=fork();    
    if(pid==0)    
    {    
        num=22;  
        printf("子进程中num=%d\n",num);    
        printf("子进程中num的首地址:%x\n",&num);    
    }    
    else    
    {    
        sleep(1);    
        printf("父进程中num=%d\n",num);    
        printf("父进程中num的首地址:%x\n",&num);    
    }    
    return 0;  
}*/


// gcc -Wall fork.c -o fork
#include <stdio.h>  
#include <sys/types.h>  
#include <unistd.h>  
int main(void)  
{  
        int i;  
    for(i=0; i<3; i++)  
        {  
       pid_t pid = fork();  
       printf("-----pid=%d-----\n",pid);
       printf("*\n");  //进程里打印的；  
    }  
    printf("  +\n"); //代表创建的进程数；  
    return 0;  
} 