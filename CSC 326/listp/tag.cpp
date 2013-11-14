#include "tag.h"

Tag::Tag(){
	}

Tag::Tag(string n){
		n=htmlTag;
}

int Tag::doingIt(int j){
	
	if ((htmlTag[0]=='<')&& (htmlTag[j]=='>')){
			if(htmlTag[1]=='/'){
				open=true;
				cout<<"This is a valid html closing tag"<<endl;
			}
			else{
				open=false;
				cout<<"This is a valid html opening tag"<<endl;
			}
		}
		else
			cout<<"This is not an valid HTML Tag"<<endl;
	return 0;
}

int Tag::get(int){

	ifstream tags;
	tags.open ("tags.txt");
	int a = htmlTag.size();
	a--;
	return a;

	
}
	
void Tag::display(){
	cout<<"Your Tag is: "<<htmlTag<<endl;
}
