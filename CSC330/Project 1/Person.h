#ifndef PERSON_H_
#define PERSON_H_

#include <iostream>
#include <string>

class Person
{
public:
	Person();
	Person(std::string fname, std::string lname);
	void setFirstName(std::string name);
	std::string getFirstName();
	void setLastName(std::string name);
	std::string getLastName();
	
private:
	std::string lastName;
	std::string firstName;
};
#endif
