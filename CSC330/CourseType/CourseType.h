#ifndef COURSETYPE_H
#define COURSETYPE_H
#include <iostream>
#include <string>
using namespace std;

class CourseType
{
public:
	CourseType();
	CourseType(string , string , string , int);
	void setCourseName(string cn);
	void setCourseNum(string cno);
	void setGrade(string gr);
	void setCreditHours(int cr);
	string getCourseName();
	string getCourseNum();
	string getGrade();
	int getCreditHours();
	
protected:
	string courseName;
	string courseNumber;
	string grade;
	int creditHours;

	
};

#endif
