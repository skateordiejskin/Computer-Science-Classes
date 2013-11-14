#include "Tag.h"

//constructor
Tag::Tag(){
	htmlTag="";
	open=true;
	}


void Tag::display(){
	//reads in from the file
	cin>>htmlTag;
	htmlTag=htmlTag;
	cout<<endl<<"The Tag is: "<<htmlTag<<endl;
}

void Tag::runningThrough(){
	//gets the length of the tag and subtracts one
	htmlLength = htmlTag.length();
	htmlLength--;

	//checks to see if the tag is valid
	if((htmlTag[0]=='<')&&(htmlTag[htmlLength]=='>')){
		//checks to see if the tag is and opening or closing tag
			if (htmlTag[1]=='/'){
				open=false;
				cout<<"This is a valid html closing tag"<<endl;
			}
			else{
				open=true;
				cout<<"This is a valid HTML opening tag"<<endl;
			}
	}
	else
		cout<<"This is not a valid HTML Tag"<<endl;
}

