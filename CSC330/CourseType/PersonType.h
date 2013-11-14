#ifndef PERSONTYPE_H
#define PERSONTYPE_H
#include<string>
using namespace std;

class PersonType
{
public:
	PersonType();
	PersonType(string fn , string ln);
	void setFirstName(string fn);
	void setLastName(string ln);
	string getFirstName();
	string getLastName();
	
protected:
	string firstName;
	string lastName;

};
# endif
