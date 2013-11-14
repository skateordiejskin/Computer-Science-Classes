#include<mpi.h>
#include<stdio.h>

#define N 1000

int main(int argc, char **argv) {
	int nprocs, mypid;
	MPI_Init(&argc, &argv);
	MPI_Comm_size(MPI_COMM_WORLD, &nprocs);
	MPI_Comm_rank(MPI_COMM_WORLD, &mypid);

	int values = N/nprocs, start = (values*mypid)+1, end = start+(values-1),i,total;

	if(mypid<15){
		for (i=start; i<=end; i++){
			total=total+i;
		}
	}
	else{
		for (i=start; i<=N; i++){
			total=total+i;
		}
	}
	printf("Partial sum from process %d of total %d is: %d. \n", mypid,nprocs,total);

	MPI_Finalize();
}
