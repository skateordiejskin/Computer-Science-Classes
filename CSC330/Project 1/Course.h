#ifndef COURSE_H_
#define COURSE_H_

#include <iostream>
#include <string>
using namespace std;
#define max 20

class Course
{
public:
	Course();
	Course(int location, string CN, string CI, int HOC, char CG, int CC);
	void set_courseName(int location, string name);
	string get_courseName(int i);
	void set_courseID(int location, string name);
	string get_courseID(int id);
	void set_hoursPerCredit(int location, int hours);
	int get_hoursPerCredit(int location);
	void set_courseGrade(int location, char grade);
	char get_courseGrade(int location);
	void set_courseCredits(int location, int credit);
	int get_courseCredits(int location);
	double numOfCredits(int);
	double calculate_GPA(int);
private:

	string courseName[max];
	string courseID[max];
	int hoursOfCourse[max];
	char courseGrade[max];
	int courseCredits[max];
	double gpa;
};

#endif