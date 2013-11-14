//Joe Skinner
//Lab 3
#include<mpi.h>
#include<stdio.h>

#define N 1000

int main(int argc, char **argv) {
	int nprocs, mypid;
	int i, j, partialSum=0, totalSum=0;
	MPI_Status *status;
	MPI_Init(&argc, &argv);
	MPI_Comm_size(MPI_COMM_WORLD, &nprocs);
	MPI_Comm_rank(MPI_COMM_WORLD, &mypid);

	int values = N/nprocs, begin = (values*mypid)+1, stop = begin+(values-1);

	for (i=begin; i<=stop; i++){
		partialSum=partialSum+i;
	}

	if (mypid == 0){
		totalSum = partialSum;
		for (j=1; j<nprocs; j++){
			MPI_Recv(&partialSum, 1 , MPI_INT, j, 0, MPI_COMM_WORLD, status);
			printf("Receive %d from process %d. \n", partialSum,j);
			totalSum=totalSum+partialSum;
		}

		printf("Total Sum: %d. \n", totalSum);
	}

	else{
		printf("Partial sum from process %d of total %d is: %d. \n", mypid,nprocs,partialSum);
		MPI_Sstop(&partialSum, 1 , MPI_INT, 0, 0, MPI_COMM_WORLD);
		printf("Stop %d to process 0 by process %d. \n", partialSum,mypid);
	}

	MPI_Finalize();
}
