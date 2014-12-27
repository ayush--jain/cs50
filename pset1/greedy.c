#include <stdio.h>
#include <cs50.h>
#include <math.h>

int main (void)
{
    printf("How much change is owed?\n");

    float owe = GetFloat();
    
    while (owe < 0)
    {
       printf("How much change is owed?\n");
       owe = GetFloat(); 
    }
    
    int coin = 0; 
    
    owe *= 100;
    owe = roundf(owe);
    owe = (int)owe;
    
    while (owe >= 100)
    { 
        owe -= 100;
        coin += 4;
    }
    
    while (owe != 0)
    {
        if (owe >= 25)
        {
            owe -= 25;
            coin ++;
            continue;
        }
        
        if (owe >= 10)
        {
            owe -= 10;
            coin ++;
            continue;
        }
        
        if (owe >= 5)
        {
            owe -= 5;
            coin ++;
            continue;
        }
        
        if (owe >= 1)
        {
            owe -= 1;
            coin ++;
            continue;
        }
    }
    
    printf("%d\n", coin);
    
    return 0;
}
