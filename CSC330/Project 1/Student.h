#ifndef STUDENT_H_
#define STUDENT_H_

#include "Course.h"
#include "Person.h"

class Student : public Course, public Person
{
public:
	Student();
	Student(int id, std::string fname, std::string lname, bool paid) : studentID(id), studentInfo(fname, lname), isPaid(paid) { }
	void set_studentID(int id);
	void set_firstName(std::string name);
	std::string get_FirstName();
	void set_lastName(std::string name);
	std::string get_lastName();
	int get_studentID();
	void set_tuitionPaid(bool ispaid);
	bool get_tuitionPaid();
	void set_numOfClasses(int num);
	int get_numOfClasses();

private:
	int studentID;
	int numberOfClasses;
	Course coursesTaken[10];
	Person studentInfo;
	bool isPaid;
};
#endif