# ifndef STUDENTTYPE_H
# define STUDENTTYPE_H
#include <iostream>
#include <string>
#include "PersonType.h"

using namespace std;

class StudentType : public PersonType
{
public:
	StudentType();
	StudentType(string ID, int nc, double grp, char paid);
	void setStudentID(int ID);
	void setNumOfCourses(int nc);
	double calculateGPA();
	void setTuition(char paid);
	int getStudentID();
	int getNumOfCourses();
	char getTuition();
	double totalCreditHours();
	double calculateTuition();

protected:
	int studentID;
	int numOfCourses;
	double gpa;
	char paidTuition;
	CourseType courses;

};
#endif

