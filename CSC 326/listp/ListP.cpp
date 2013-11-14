/** @file listP.cpp
 *  ADT list - Pointer-based implementation. */

#include <cstddef>     // for NULL
#include <new>         // for bad_alloc
#include "listP.h"     // header file

using namespace std;

// definitions of methods follow:
//   . . .
list::list():head(NULL),size(0) {
}

list::list(const list& alist)
   : size(alist.size)
{
   if (alist.head == NULL)
      head = NULL;  // original list is empty

   else
   {  // copy first node
      head = new listNode;
      head->item = alist.head->item;

      // copy rest of list
      listNode *newPtr = head;  // new list pointer
      // newPtr points to last node in new list
      // origPtr points to nodes in original list
      for (listNode *origPtr = alist.head->next;
	   origPtr != NULL;
	   origPtr = origPtr->next)
      {  newPtr->next = new listNode;
         newPtr = newPtr->next;
	 newPtr->item = origPtr->item;
      }  // end for

      newPtr->next = NULL;
   }  // end if
}  // end copy constructor

list::~list()
{
   while (!isEmpty())
      remove(1);
}  // end destructor

bool list::isEmpty() const
{
   return size == 0;
}  // end isEmpty

int list::getLength() const
{
   return size;
}  // end getLength

list::listNode *list::find(int index) const
{
   if ( (index < 1) || (index > getLength()) )
      return NULL;

   else  // count from the beginning of the list.
   {  listNode *cur = head;
      for (int skip = 1; skip < index; ++skip)
         cur = cur->next;
      return cur;
   }  // end if
}  // end find

void list::retrieve(int index,
                    list& dataItem) const
   throw(listIndexOutOfRangeException)
{
   if ( (index < 1) || (index > getLength()) )
      throw listIndexOutOfRangeException(
	 "listIndexOutOfRangeException: retrieve index out of range");
   else
   {  // get pointer to node, then data in node
      listNode *cur = find(index);
      dataItem = cur->item;
   }  // end if
}  // end retrieve

void list::insert(int index, const list& newItem)
   throw(listIndexOutOfRangeException, listException)
{
   int newLength = getLength() + 1;

   if ( (index < 1) || (index > newLength) )
      throw listIndexOutOfRangeException(
	 "listIndexOutOfRangeException: insert index out of range");
   else
   {  // try to create new node and place newItem in it
      try
      {
	 listNode *newPtr = new listNode;
	 size = newLength;
	 newPtr->item = newItem;

	 // attach new node to list
	 if (index == 1)
	 {  // insert new node at beginning of list
	    newPtr->next = head;
	    head = newPtr;
	 }
	 else
	 {  listNode *prev = find(index-1);
            // insert new node after node
            // to which prev points
            newPtr->next = prev->next;
	    prev->next = newPtr;
	 }  // end if
      }  // end try
      catch (bad_alloc e)
      {
	 throw listException(
	    "listException: memory allocation failed on insert");
      }  // end catch
   }  // end if
}  // end insert

void list::remove(int index) throw(listIndexOutOfRangeException)
{
   listNode *cur;

   if ( (index < 1) || (index > getLength()) )
      throw listIndexOutOfRangeException(
	 "listIndexOutOfRangeException: remove index out of range");
   else
   {  --size;
      if (index == 1)
      {  // delete the first node from the list
         cur = head;  // save pointer to node
         head = head->next;
      }

      else
      {  listNode *prev = find(index - 1);
         // delete the node after the node to which prev points
         cur = prev->next;  // save pointer to node
	 prev->next = cur->next;
      }  // end if

      // return node to system
      cur->next = NULL;
      delete cur;
      cur = NULL;
   }  // end if
}  // end remove
