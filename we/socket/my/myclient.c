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
    #include <signal.h>   
    //#define IP "192.168.1.106" 
    #define IP "172.16.25.81"   
    #define PORT 2370    
    #define TEST    
    void process_conn_client(int s);    
    void signal_g();  
    int main(int argc,char *argv[])    
    {    
      int s;  
      struct sockaddr_in server_addr;    
      int err;    
          
      //创建套接字     
      s=socket(AF_INET,SOCK_STREAM,0);    
      if(s<0)    
       {    
         printf("socket erro\n");    
         return -1;    
       }    
       //设置服务器端的地址，端口等     
       server_addr.sin_family=AF_INET;    
       server_addr.sin_addr.s_addr=inet_addr(IP);//字符串类型转IP类型     
       server_addr.sin_port=htons(PORT);    
       bzero(&(server_addr.sin_zero),8);    
        
        #ifndef TEST    
         printf("a");    
        #endif    
        connect(s,(struct sockaddr *)&server_addr,sizeof(struct sockaddr));//连接服务器     
        #ifndef TEST    
         printf("b");    
        #endif    
        
      process_conn_client(s);    
      close(s);    
    }    
        
    void process_conn_client(int s)    
    {    
      ssize_t size=0;  
      char buffer[1024];    
      signal(SIGINT ,signal_g);//捕捉中断信号（Ctrl+C键），使必须输入“end”才能结束  

      memset(buffer,'\0',1024);    
        recv(s,buffer,1024,0);//接收服务器端发来的信息     
        printf("%s\n",buffer); 

      while(1)    
      {    



        memset(buffer,'\0',1024);    
        fgets(buffer,1024,stdin);  
  
         send(s, buffer, 1024, 0);    
        if(strncmp("end",buffer,3)==0)    
         {    
           break;    
         }    
          
        memset(buffer,'\0',1024);    
        recv(s,buffer,1024,0);//接收服务器端发来的信息     
        printf("%s\n",buffer);  
      }    
    }    
   void signal_g()//信号处理函数   
   {  
       
      signal(SIGINT,SIG_IGN);  
   }  