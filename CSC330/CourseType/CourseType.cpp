#include "CourseType.h"
#include<iostream>
#include <string>

using namespace std;

CourseType::CourseType()
{
	courseName = "NULL";
	courseNumber = "NULL";
	grade = "NULL";
	creditHours = 0;
}

CourseType::CourseType(string cn, string cno, string gr, int ch)
{
	courseName = cn;
	courseNumber = cno;
	grade = gr;
	creditHours = ch;
}

void CourseType::setCourseName(string cn)
{
	courseName = cn;
}

void CourseType::setCourseNum(string cno)
{
	courseNumber = cno;
}

void CourseType::setGrade(string gr)
{
	grade = gr;
}

void CourseType::setCreditHours(int ch)
{
	creditHours = ch;
}

string CourseType::getCourseName()
{
	return courseName;
}

string CourseType::getCourseNum()
{
	return courseNumber;
}

string CourseType::getGrade()
{
	return grade;
}

int CourseType::getCreditHours()
{
	return creditHours;
}

