//
//  demoFirstViewController.m
//  demoFirst
//
//  Created by Sturm on 11/14/09.
//  Copyright __MyCompanyName__ 2009. All rights reserved.
//

#import "YEAHViewController.h"


#define kBallSpeedX 20
#define kBallSpeedY 40

@implementation YEAHViewController
@synthesize ball,paddle,playerScore,ballVelocity;

/*
 // The designated initializer. Override to perform setup that is required before the view is loaded.
 - (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil {
 if (self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil]) {
 // Custom initialization
 }
 return self;
 }
 */

- (void)touchesBegan:(NSSet *)touches withEvent:(UIEvent *)event {
	
}

-(void) gameLoop {
	
	ball.center = CGPointMake(ball.center.x + ballVelocity.x , ball.center.y + ballVelocity.y);
	
	if(ball.center.x > self.view.bounds.size.width || ball.center.x < 0) {
		ballVelocity.x = -ballVelocity.x;
	}
	
	if(ball.center.y > self.view.bounds.size.height || ball.center.y < 0) {
		ballVelocity.y = -ballVelocity.y;
	}
	//add to bounce off racket
	if (CGRectIntersectsRect(ball.frame, paddle.frame)) {
		if(ball.center.y < paddle.center.y){
			ballVelocity.y = -ballVelocity.y;
			score++;
			playerScore.text = [NSString stringWithFormat:@"%d",score];				
			
			
		}
	}
	
	
	
}


// Implement viewDidLoad to do additional setup after loading the view, typically from a nib.
- (void)viewDidLoad {
    [super viewDidLoad];
	score = 0;	
	ballVelocity = CGPointMake(kBallSpeedX,kBallSpeedY);
	[NSTimer scheduledTimerWithTimeInterval:0.05 target:self selector:@selector(gameLoop) userInfo:nil repeats:YES];
	NSString *songPath = [[NSBundle mainBundle] pathForResource:@"Muse" ofType:@"mp3"];
	backgroundMusic =  [[AVAudioPlayer alloc] initWithContentsOfURL:[NSURL fileURLWithPath:songPath]error:NULL];
	[backgroundMusic play];
}



-(void)touchesMoved:(NSSet *)touches withEvent:(UIEvent *)event {
	UITouch *touch = [[event allTouches] anyObject];
	CGPoint location = [touch locationInView:touch.view];
	CGPoint xLocation = CGPointMake(location.x,paddle.center.y);
	
	
	paddle.center = xLocation;
	
}




/*
 // Override to allow orientations other than the default portrait orientation.
 - (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation {
 // Return YES for supported orientations
 return (interfaceOrientation == UIInterfaceOrientationPortrait);
 }
 */


- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning]; // Releases the view if it doesn't have a superview
    // Release anything that's not essential, such as cached data
}

- (void)dealloc {
    [super dealloc];
	[ball release];
	[paddle release];
	[playerScore release];
	
}

@end
