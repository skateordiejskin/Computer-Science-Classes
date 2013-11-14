#include"Student.h"
#include"Course.h"
#include "Person.h"

using namespace std;

Student::Student()
{
	studentID = 0;
	isPaid = false;
	numberOfClasses = 0;
}

//set and get ID number
void Student::set_studentID(int ID){
	studentID = ID;
}

int Student::get_studentID(){
	return studentID;
}

//set and get first name
void Student::set_firstName(string fname){
	studentInfo.setFirstName(fname);
}

string Student::get_FirstName(){
	return studentInfo.getFirstName();
}

//set and get last name
void Student::set_lastName(string lname){
	studentInfo.setLastName(lname);
}
string Student::get_lastName(){
	return studentInfo.getLastName();
}

//set and get payment bool
void Student::set_tuitionPaid(bool paid){
	isPaid = paid;
}

bool Student::get_tuitionPaid(){
	return isPaid;
}

//set and get number of classes
void Student::set_numOfClasses(int numOfClass){
	numberOfClasses = numOfClass;
}

int Student::get_numOfClasses(){
	return numberOfClasses;
}