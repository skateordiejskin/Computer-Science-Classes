#include <iostream>
#include "BinaryTree.h"
#include <fstream>
#include <string>
#include <conio.h>
typedef void (*FunctionType)(TreeItemType& anItem);
class LearningTree: public BinaryTree {
public:
	LearningTree();
	void Learn(TreeItemType newQuestion,TreeItemType newanimal,TreeNode* current);
    TreeItemType readdata();//gets data from file
	TreeItemType readdataFI();//gets data from standard input
	void Question(); //Question the player if they would like to play again
	void filltree(TreeNode *newnode);//fills the binary tree from a file
	void playGame(TreeNode *currenttree);//the logic of the game
	void copynewdata();
	TreeNode* getroot();//return were the tree starts from
	bool play;

private:
	ifstream indata;
	
	
	

};
