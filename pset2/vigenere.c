#include <stdio.h>
#include <cs50.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>

int main (int argc, string argv [])
{
    if (argc != 2)
    {
        printf("Enter in correct format\n");
        return 1;
    }
    
    string c = argv [1];
     
    int t = strlen(c);
    int i,n, k, a[1000000], j;
    
    for (j = 0; j < t; j++)
    {
        if (isalpha(c[j]))
            continue;
            
        else
        {
            printf("Enter in correct format\n");
            return 1;
        }
    }
    
    j = 0;
    
    string p = GetString();
    
    for (i = 0, n = strlen (p); i < n; i++)
    {
        if(j == t)
            j = 0;
            
        if (isalpha(p[i]) && p[i] >= 'a' && p[i] <= 'z')
        {
            if (islower(c[j]))
                k = (c[j] - 97) + p[i];
                 
            if (isupper(c[j]))
                k = (c[j] - 65) + p[i];
                
            while (k > 122)
            {
                k -= 26;
            }
            a[i] = k;
            j++;
        }
            
        else if (isalpha(p[i]) && p[i] >= 'A' && p[i] <= 'Z')
        {
            if (islower(c[j]))
                k = (c[j] - 97) + p[i];
                 
            if (isupper(c[j]))
                k = (c[j] - 65) + p[i];
               
            while (k > 90)
            {
                k -= 26;
            }
            a[i] = k;
            j++;
        }
            
        else    
            a[i] = p[i];
    }
    
    for (i = 0; i < n; i++)
    {
        printf("%c", a[i]);
    }
    printf("\n");
    
    return 0;
}
