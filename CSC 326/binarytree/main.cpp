#include <iostream>
#include "guessTree.h"

using namespace std;

int main(){
	guessTree animaltree;
		cout<<"Welcome to the Guessing Wizard!"<<endl;
		cout<<"After each question, respond y for yes and n for no"<<endl;
		cout<<"Press enter when ready:"<<endl;
	getch();
	while(animaltree.play==true){
		animaltree.playGame(animaltree.getroot());
		system("cls");
	}
return 0;
}