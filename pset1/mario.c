#include <stdio.h>
#include <cs50.h>

int main(void)
{
    int i, j;
    printf("Height:");
    int h = GetInt();
    
    //ensure user inputs a value between 1 and 23
    while (h < 0 || h > 23)
    {
        printf("Retry:");
        h = GetInt();
    }    
    
    if (h == 0)
        return 0;
        
    //print half pyramid
    for (i = 1; i < h+1; i++)
    {
        j = i;
        int k = h - i;
        while (k--)
        {
            printf(" ");
        }
        printf("#");
        while (j--)
        {
            printf("#");
        }
        
        //code for hacker edition
       
       /* printf(" ");
        printf(" ");
        j = i;
        
        while (j--)
        {
            printf("#");
        }
        */
        
        printf("\n");
    }
    
    return 0;
}
