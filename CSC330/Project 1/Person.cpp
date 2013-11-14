#include "Person.h"

using namespace std;

Person::Person()
{
	firstName = "";
	lastName = "";
}

Person::Person(string fname, string lname)
{
	firstName = fname;
	lastName = lname;
}

string Person::getFirstName()
{
	return firstName;
}

void Person::setFirstName(string name)
{
	firstName = name;
}

string Person::getLastName()
{
	return lastName;
}

void Person::setLastName(string name)
{
	lastName = name;
}