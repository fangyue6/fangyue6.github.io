#include <stdio.h>    
    #include <stdlib.h>    
    #include <strings.h>    
    #include <sys/types.h>    
    #include <sys/socket.h>    
    #include <unistd.h>    
    #include <arpa/inet.h>    
    #include <netinet/in.h>    
    #include <string.h>    
    #include <errno.h>    
    #define PORT 2370    
    #define BACKLOG 2    
    //#define IP "192.168.1.106"    
    void process_conn_server(int s,char * ip);    
        
    int main(int argc,char *argv[])    
    {    
      int ss,sc;    
      struct sockaddr_in server_addr;    
      struct sockaddr_in client_addr;    
      int err;    
      pid_t pid;    
        
      //创建套接字     
      ss=socket(AF_INET,SOCK_STREAM,0);    
      if(ss<0)    
       {    
         printf("socket error\n");    
         return -1;    
       }    
        
      //设置服务器端的地址，端口等     
      server_addr.sin_family = AF_INET;                                   
      server_addr.sin_port = htons(PORT);                    
      server_addr.sin_addr.s_addr = INADDR_ANY;                
      bzero(&(server_addr.sin_zero), 8);      
      //将创建的套接字绑定到服务器端                               
      err = bind(ss, (struct sockaddr *)&server_addr, sizeof(struct sockaddr));     
     if(err<0)    
       {    
         printf("bind error\n");    
         return -1;    
       }    
        
      //监听套接字     
      err=listen(ss,BACKLOG);    
      if(err<0)    
       {    
         printf("listen error\n");    
         return -1;    
       }    
        
      //主循环程序     
      for(;;)    
       {    
         int addrlen=sizeof(struct sockaddr);    
         sc=accept(ss,(struct sockaddr*)&client_addr,&addrlen);//如果调用成功，www.linuxidc.com将返回一个新的套接字与客户端通信     
         printf("%s has connected success\n",inet_ntoa(client_addr.sin_addr));   
         
         
         if(sc<0)    
          {    
            continue;    
          }    
         pid=fork();//创建一个进程与客户端通信    
         if(pid==0)    
          {    

            close(ss);//为了避免影响，在子进程中关闭父进程套接字，父进程关闭子进程的套接字（并没有真正的关闭，只是让它们不相互影响）     
            process_conn_server(sc,inet_ntoa(client_addr.sin_addr));//调用子进程通信函数     
          }    
         else    
          {    
            close(sc);    
          }    
       }    
    }    
        
    void process_conn_server(int s,char *ip)    
    {    
          
      char buffer[1024]; 
      char temp[1024];

      memset(buffer,'\0',1024); //置空
      memset(temp,'\0',1024); //置空
      sprintf(buffer,"You connected the server successfully, your Ip is %s .You can send message to server.\n",ip); 
      send(s,buffer,1024,0);   
         
      while(1)    
      {    
       memset(buffer,'\0',1024); //置空
       memset(temp,'\0',1024); //置空     
       recv(s,buffer,1024,0);//接收消息www.linuxidc.com     
       strcpy(temp,buffer);
       if(strncmp("end",buffer,3)==0)//判断是否符合退出条件     
       {   
       printf("%s has lost connect\n",ip); 
       close(s);    
       exit(EXIT_SUCCESS);    
       }    

  
       printf("%s say :%s\n",ip,buffer);    
           
        
       //统计客户端输出的字符个数并发送给客户端     
        
      //sprintf(buffer,"%d characters altogether\n",strlen(buffer)-1);     
      sprintf(buffer,"The Server reply you: your message is %s",temp);
      send(s,buffer,1024,0);     
    }    
}    
    
