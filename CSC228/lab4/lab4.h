#include<iostream>
#define INFINITY 999
using namespace std;

class Lab4{
    private:
        int adjacentMatrix[15][15];
        int pre[15],dist[15];
        bool mark[15];
        int input;
        int numVert;

    public:
        void read();
        void initialize();
        int getClosestNode();

  void calculatedistance();
        void output();
        void printPath(int);
};