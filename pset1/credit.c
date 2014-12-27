/* Hans Peter Luhn algorithm for checking validity of credit card numbers*/

#include <stdio.h>
#include <cs50.h>
#include <math.h>

int main (void)
{
    printf("Number: ");
    long long int num = GetLongLong();
    
    char s[32]; 
    int l = sprintf (s, "%lld", num);
    
    if (l != 13 && l != 15 && l != 16)
    {
        printf("INVALID\n");
        return 0;
    }
    
    //store in array
    int i, a[32], ans = 0, j, k, sum = 0;
    for (i = l; i > 0; i--)
    {
        a[i] = num % 10;
        num /= 10;
    }
    
    //check for first digit
    if (a[1] != 3 && a[1] != 4 && a[1] != 5)
    {
        printf("INVALID\n");
        return 0;
    }
    
    for (i = l-1; i > 0; i -= 2)
    {
        j = a[i] * 2;
        if (j >= 10)
        {
           k = j % 10;
           j /= 10;
           k += j;
           ans += k; 
        }
        
        else
            ans += j;
    }
    
    for (i = l; i > 0; i -= 2)
    {
        sum += a[i];
    }
    
    if ((sum + ans) % 10 == 0)
    {
        if (a[1] == 3)
        {
            printf("AMEX\n");
            return 0;
        }
        
        if (a[1] == 5)
        {
            printf("MASTERCARD\n");
            return 0;
        }
        
        if (a[1] == 4)
        {
            printf("VISA\n");
            return 0;
        }
    }
    
    else 
    {
        printf("INVALID\n");
        return 0;
    }
    
}
