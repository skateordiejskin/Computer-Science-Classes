#include "lab4.h";

void Lab4::read(){
	cout<<"Enter # of vertices of the graph(should be > 0):\n";
    cin>>numVert;
    while(numVert <= 0){
        cout<<"Enter the number of vertices of the graph(should be > 0)\n";
        cin>>numVert;
    }

    cout<<"Enter the adjacency matrix for the graph:\n";
    cout<<"To enter infinity, enter "<<INFINITY<<endl;
    for(int i=0;i<numVert;i++){
        cout<<"Enter the (+ve) weights for the row "<<i<<endl;
        for(int j =0;j<numVert;j++){
            cin>>adjacentMatrix[i][j];
            while(adjacentMatrix[i][j]<0){
                cout<<"Weights should be +ve. Enter the weight again\n";
                cin>>adjacentMatrix[i][j];
		  }
        }
    }
    cout<<"Enter the input vertex\n";
    cin>>input;
    while((input<0) && (input>numVert-1)){
        cout<<"input vertex should be between 0 and "<<numVert-1<<endl;
	   cout<<"Enter the input vertex again:\n";
        cin>>input;
    }
}


void Lab4::initialize(){
    for(int i=0;i<numVert;i++){
        mark[i] = false;
        pre[i] = -1;
        dist[i] = INFINITY;
    }
    dist[input]= 0;
}

void Lab4::calculatedistance(){
    initialize();
    int mindist = INFINITY;
    int closestUnmarkedNode;
    int count = 0;
    while(count < numVert){
        closestUnmarkedNode = getClosestNode();
        mark[closestUnmarkedNode] = true;
        for(int i=0;i<numVert;i++) {
            if((!mark[i]) && (adjacentMatrix[closestUnmarkedNode][i]>0) ){
                if(dist[i] > dist[closestUnmarkedNode]+adjacentMatrix[closestUnmarkedNode][i]){
                    dist[i] = dist[closestUnmarkedNode]+adjacentMatrix[closestUnmarkedNode][i];
                    pre[i] = closestUnmarkedNode;
                }
            }
        }
        count++;
    }
}

int Lab4::getClosestNode(){
    int mindist = INFINITY;
    int closestUnmarkedNode;
    for(int i=0;i<numVert;i++){
        if((!mark[i]) && ( mindist >= dist[i])){
            mindist = dist[i];
            closestUnmarkedNode = i;
	   }
    }
    return closestUnmarkedNode;
}

void Lab4::printPath(int node){
    if(node == input)
        cout<<(char)(node + 97)<<"..";
    else if(pre[node] == -1)
        cout<<"No path from ì<<input<<îto "<<(char)(node + 97)<<endl;
    else{
        printPath(pre[node]);
        cout<<(char) (node + 97)<<"..";
    }
}

void Lab4::output(){
    for(int i=0;i<numVert;i++){
        if(i == input)
            cout<<(char)(input + 97)<<".."<<input;
        else
            printPath(i);
        cout<<"->"<<dist[i]<<endl;
    }
}