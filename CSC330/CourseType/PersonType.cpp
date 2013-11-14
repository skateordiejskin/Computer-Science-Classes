#include"PersonType.h"
#include<iostream>
#include<string>
using namespace std;

PersonType::PersonType()
{
	firstName = "NULL";
	lastName = "NULL";
}

PersonType::PersonType(string fn , string ln)
{
	firstName = fn;
	lastName = ln;
}

void PersonType::setFirstName(string fn)
{
	firstName = fn;
}

void PersonType::setLastName(string ln)
{
	lastName = ln;
}

string PersonType::getFirstName()
{
	return firstName;
}

string PersonType::getLastName()
{
	return lastName;
}