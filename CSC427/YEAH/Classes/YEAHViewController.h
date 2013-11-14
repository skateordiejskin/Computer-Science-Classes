//
//  demoFirstViewController.h
//  demoFirst
//
//  Created by Sturm on 11/14/09.
//  Copyright __MyCompanyName__ 2009. All rights reserved.
//

#import <UIKit/UIKit.h>
#import <AVFoundation/AVFoundation.h>

@interface YEAHViewController : UIViewController {
	
	IBOutlet UILabel * playerScore;
	IBOutlet UIImageView * ball;
	IBOutlet UIImageView * paddle;
	AVAudioPlayer * backgroundMusic;
	
	
	CGPoint ballVelocity;
	
	NSInteger gameState;
	NSInteger score;
	
	
}

@property (nonatomic, retain) IBOutlet UILabel * playerScore;
@property (nonatomic, retain) IBOutlet UIImageView * ball;
@property (nonatomic, retain) IBOutlet UIImageView * paddle; 


@property(nonatomic) CGPoint ballVelocity;


@end



