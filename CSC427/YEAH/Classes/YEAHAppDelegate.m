//
//  YEAHAppDelegate.m
//  YEAH
//
//  Created by Student on 12/13/11.
//  Copyright __MyCompanyName__ 2011. All rights reserved.
//

#import "YEAHAppDelegate.h"
#import "YEAHViewController.h"

@implementation YEAHAppDelegate

@synthesize window;
@synthesize viewController;


- (void)applicationDidFinishLaunching:(UIApplication *)application {    
    
    // Override point for customization after app launch    
    [window addSubview:viewController.view];
    [window makeKeyAndVisible];
}


- (void)dealloc {
    [viewController release];
    [window release];
    [super dealloc];
}


@end
