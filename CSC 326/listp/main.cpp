#include <iostream>
#include <string>
#include "ListP.h"
#include "tag.h"
using namespace std;

int main(){
	int i = 1, j = 1, k=0;
	string htmlTag;

	tag atag;
	



	//Reads num.txt into cin
	while(!cin.eof()){
		cin>>htmlTag;
		int l=htmlTag.size();
		l--;

		//checks to see if the number is even
		if((htmlTag[0]=='>') && (htmlTag[l])){
			aTag.insert(i,htmlTag);
		i++;
		}
		//checks to see if the number is odd
		else{
			aTag.insert(j, htmlTag);
			j++;
		}
	}
	//prints out even numbers
		cout<<"The open tags are: "<<endl;
		for(k=1; k<i; k++){
			evenList.retrieve(k,htmlTag);
			
			cout<<k<<". "<<htmlTag<<endl;
		}
			
		//prints out odd numbers
			cout<<endl<<"The closed tags are: "<<endl;
		for(k=1; k<j; k++){
			oddList.retrieve(k,htmlTag);
			
			cout<<k<<". "<<htmlTag<<endl;
		}
return 0;
}

