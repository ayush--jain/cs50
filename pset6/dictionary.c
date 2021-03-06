/****************************************************************************
 * dictionary.c
 *
 * Computer Science 50
 * Problem Set 6
 *
 * Implements a dictionary's functionality.
 ***************************************************************************/

#include <stdbool.h>
#include <stdlib.h>
#include <stdio.h>
#include "dictionary.h"

/**
 * Returns true if word is in dictionary else false.
 */
bool check(const char* word)
{
    // TODO
    return false;
}

/**
 * Loads dictionary into memory.  Returns true if successful else false.
 */
bool load(const char* dictionary)
{
    // TODO
    FILE* fp = NULL;
    typedef struct node
    {
        char word[LENGTH + 1]; 
        struct node* next;
    }node;
    
    node* hashtable[500];
    
    
    node* cursor = hashtable[0];
    for(int i = 0; i < 500; i++)
    {
        node* new_node = malloc(sizeof(node)); 
        fscanf(fp, "%s", new_node->word);
        while(cursor != NULL)
        {
            new_node->next = hashtable[i];
            hashtable[i] = new_node;
        }
    }   
    return false;
}

/**
 * Returns number of words in dictionary if loaded else 0 if not yet loaded.
 */
unsigned int size(void)
{
    // TODO
    return 0;
}

/**
 * Unloads dictionary from memory.  Returns true if successful else false.
 */
bool unload(void)
{
    // TODO
    return false;
}
