#include "HttpReq.h"
#include <string.h>
int main(void)
{
    HttpRequest* Http;
    char http_return[4096] = {0};
    char http_msg[4096] = {0};
    strcpy(http_msg, "http://www.baidu.com");

    if(Http->HttpGet(http_msg, http_return)){
        std::cout << http_return << std::endl;
    }
    return 0;
}