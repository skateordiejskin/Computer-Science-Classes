#include "guessTree.h"
#include <iostream>

void Gettext(TreeItemType& currentitem){ // Opens data file, outputs the current item
	ofstream outdata;
	outdata.open("questions.txt");
	outdata<<currentitem<<endl;
}
guessTree::guessTree(){ // 
	indata.open("questions.txt");
	setRootData(readdata());
	play=true;
	filltree(root);
}
void guessTree:: filltree(TreeNode *newnode){ // Reads in from input file, puts into left node
											  // after null string, puts it in right node
	TreeItemType input;
	input=readdata();

	if(input!="null"){
		newnode->leftChildPtr=new TreeNode(input);
		filltree(newnode->leftChildPtr);
	}
		input=readdata();
		
		if(input!="null"){
			newnode->rightChildPtr=new TreeNode(input);
			filltree(newnode->rightChildPtr);
		}
}
TreeItemType guessTree ::readdata(){ // Reads in data for filltree from the input file, returns
	string transfer;
	char in[1000];
	indata.getline(in,1000,'\n');
	transfer=in;
	return transfer;
}
TreeItemType guessTree ::readdataFI(){ // Reads in user input, returns
	string transfer;
	char in[1000];
	cin.getline(in,1000,'\n');
	transfer=in;
	return transfer;
}

void guessTree::playGame(TreeNode *currenttree){ // Runs the game

	
		char input;
		string newanimal,question;
tryagain:
		NULL;
			cout<<currenttree->item<<endl;
			input=getch();
			if(input=='n'){
				if(currenttree->leftChildPtr==NULL){
					cout<<"I dont seem to know what your animal is!"<<endl;
					cout<<"what is your animal?"<<endl;
					newanimal=readdataFI();
					cout<<"What is a good qeustion that is unique to your animal?";
					question=readdataFI();
					Learn(question,newanimal,currenttree);
					
				}
				
				else{
				playGame(currenttree->leftChildPtr);
				}
				
			}
			if(input=='y'){
				if(currenttree->rightChildPtr!=NULL){
					playGame(currenttree->rightChildPtr);
					}
				else{
					cout<<"I won!! Next time think of a harder animal"<<endl;
					Question();
				}

			}
			else if(input!='y'&&input!='n'){
				cout<<"Invalid answer!!"<< "Please answer in either y for yes and n for no"<<endl;
				goto tryagain;
			}
}

void guessTree::Learn(TreeItemType newQuestion,TreeItemType newanimal,TreeNode* current){
	TreeItemType oldanimal=current->item;
	current->item=newQuestion;
	current->leftChildPtr=new TreeNode(oldanimal);
	current->rightChildPtr=new TreeNode("Is it a "+(newanimal+"?"));
}
void guessTree::copynewdata(){
preorderTraverse(Gettext);
}
TreeNode* guessTree::getroot(){
	return root;
}
void guessTree::Question(){
	cout<<"Do you want to play again:";
	char input=getch();
	if(input=='n'){
		play=false;
	}
}