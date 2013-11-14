#include "tag.h"
#include <string>
using namespace std;

void Tag::get(){
	cout<<"Enter html tag: ";
	getline (cin,name); 
	count = 0;
}
int Tag::getlength(){
	return name.length();
}

int Tag::movingthrough(int i){
	while (count<i){
		if (name[count]=='<')
		{
			if (name[count+1]=='/')
				open=false;
			else
				open=true;
			return count;
		}
		count++;
	}
}
void Tag::display(){
	cout<<endl<<endl<<"Tag: ";
	if (name[count]!='\0'){
		while((name[count]!='>')&&(name[count]!='\0'))
		{
		cout<<name[count];
		count++;
		}
		cout<<name[count]<<"   Type: ";
		if (open==true)
			cout<<"Opening"<<endl;
		else
			cout<<"Closing"<<endl;
	}
	count++;
}