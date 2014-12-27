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
    
    string p = GetString();
    int cipher = atoi(argv[1]);
    
    int i, n, k, a[1000000];
    
    for (i = 0, n = strlen (p); i < n; i++)
    {
        if (isalpha(p[i]) && p[i] >= 'a' && p[i] <= 'z')
        {
            k = p[i] + cipher;
            while (k > 122)
            {
                //k = 96 + (k - 122)
                k -= 26;
            }
            a[i] = k;
        }
        
        else if (isalpha(p[i]) && p[i] >= 'A' && p[i] <= 'Z')
        {
            k = p[i] + cipher;
            while (k > 90)
            {
                //k = 64 + (k - 90)
                k -= 26;
            }
            a[i] = k;
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
