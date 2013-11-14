/** @file listP.h */

#include "listException.h"
#include "listIndexOutOfRangeException.h"
typedef int list;
//typedef desired-type-of-list-item list;

/** @class list
 * ADT list - Pointer-based implementation. */
class list
{
public:
// Constructors and destructor:

   /** Default constructor. */
   list();

   /** Copy constructor.
    * @param alist The list to copy. */
   list(const list& alist);

   /** Destructor. */
   ~list();

// list operations:
   bool isEmpty() const;
   int getLength() const;
   void insert(int index, const list& newItem)
      throw(listIndexOutOfRangeException, listException);
   void remove(int index)
      throw(listIndexOutOfRangeException);
   void retrieve(int index, list& dataItem) const
      throw(listIndexOutOfRangeException);

private:
   /** A node on the list. */
   struct listNode
   {
      /** A data item on the list. */
      list item;
      /** Pointer to next node. */
      listNode    *next;
   }; // end listNode

   /** Number of items in list. */
   int       size;
   /** Pointer to linked list of items. */
   listNode *head;

   /** Locates a specified node in a linked list.
    * @pre index is the number of the desired node.
    * @post None.
    * @param index The index of the node to locate.
    * @return A pointer to the index-th node. If index < 1
    *         or index > the number of nodes in the list,
    *         returns NULL. */
   listNode *find(int index) const;
}; // end list
// End of header file.
