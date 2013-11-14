#include "tag.h"

int main ()
{
	//declare variables
	int a = 0, end = 0;

	//class tag
	Tag atag;

	//get string
	atag.get();

	//get length of string, put into a
	a = atag.getlength();

	//checking for <, if none found, end will be higher than a
	end = atag.movingthrough(a);

	//error message if no html tags are found
	if (end>a)
		cout<<endl<<"No HTML Tags found.";

	//loop to print out tag and type, then check for next tag and type in string
	while (end < a){
	atag.display();
	end = atag.movingthrough(a);
	}

	cout<<endl<<endl;
	return 0;
}