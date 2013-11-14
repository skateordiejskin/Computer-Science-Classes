//
//  YEAHAppDelegate.h
//  YEAH
//
//  Created by Student on 12/13/11.
//  Copyright __MyCompanyName__ 2011. All rights reserved.
//

#import <UIKit/UIKit.h>

@class YEAHViewController;

@interface YEAHAppDelegate : NSObject <UIApplicationDelegate> {
    UIWindow *window;
    YEAHViewController *viewController;
}

@property (nonatomic, retain) IBOutlet UIWindow *window;
@property (nonatomic, retain) IBOutlet YEAHViewController *viewController;

@end

