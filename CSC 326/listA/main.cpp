//Joe Skinner
//CSC 326
//List A
//2-15-11


#include <iostream>
#include "ListA.h"
using namespace std;


int main(){
	int num, i = 1, j = 1, k=0;
	bool success = true;

	List evenList;
	List oddList;

	//Reads num.txt into cin
	while(!cin.eof()){
		cin>>num;
		//checks to see if the number is even
		if(num%2==0){
			evenList.insert(i, num, success);
		i++;
		}
		//checks to see if the number is odd
		else{
			oddList.insert(j, num, success);
			j++;
		}
	}
	//prints out even numbers
		cout<<"The even numbers are: "<<endl;
		for(k=1; k<i; k++){
			evenList.retrieve(k, num, success);
			
			cout<<k<<". "<<num<<endl;
		}
			
		//prints out odd numbers
			cout<<endl<<"The odd numbers are: "<<endl;
		for(k=1; k<j; k++){
			oddList.retrieve(k, num, success);
			
			cout<<k<<". "<<num<<endl;
		}
return 0;
}

