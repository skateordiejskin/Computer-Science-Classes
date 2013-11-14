using System;
using System.Collections.Generic;
using System.Linq;
using Microsoft.Xna.Framework;
using Microsoft.Xna.Framework.Audio;
using Microsoft.Xna.Framework.Content;
using Microsoft.Xna.Framework.GamerServices;
using Microsoft.Xna.Framework.Graphics;
using Microsoft.Xna.Framework.Input;
using Microsoft.Xna.Framework.Media;
namespace ClownFishChomp
{
    class shark
    {
        public Texture2D shark1;
        public Rectangle sharkBR;
        public Vector2 sharkPosition;

        public void LoadContent(ContentManager theContentManager)
        {
            shark1 = theContentManager.Load<Texture2D>("shark");
            sharkPosition = new Vector2(100, 100);
            sharkBR = new Rectangle((int)sharkPosition.X, (int)sharkPosition.Y,
                                  shark1.Width, shark1.Height);
        }

        public void Update(GameTime gameTime)
        {
            KeyboardState keyboardState = Keyboard.GetState();
            sharkBR.X = (int)sharkPosition.X;
            sharkBR.Y = (int)sharkPosition.Y;

            //shark movements
            if (keyboardState.IsKeyDown(Keys.W) && sharkPosition.Y > 0)
            {
                sharkPosition.Y -= 5;
            }
            if (keyboardState.IsKeyDown(Keys.S) && sharkPosition.Y < (540 - shark1.Height))
            {
                sharkPosition.Y += 5;
            }
            if (keyboardState.IsKeyDown(Keys.D) && sharkPosition.X < (720 - shark1.Width))
            {
                sharkPosition.X += 5;
            }
            if (keyboardState.IsKeyDown(Keys.A) && sharkPosition.X > 0)
            {
                sharkPosition.X -= 5;
            }

            //Xbox Controller
            if (GamePad.GetState(PlayerIndex.Two).Buttons.A == ButtonState.Pressed && sharkPosition.Y > 0)
            {
                sharkPosition.Y -= 5;
            }
            if (GamePad.GetState(PlayerIndex.Two).Buttons.Y == ButtonState.Pressed && sharkPosition.Y < (540 - shark1.Height))
            {
                sharkPosition.Y += 5;
            }
            if (GamePad.GetState(PlayerIndex.Two).Buttons.B == ButtonState.Pressed && sharkPosition.X < (720 - shark1.Width))
            {
                sharkPosition.X += 5;
            }
            if (GamePad.GetState(PlayerIndex.Two).Buttons.X == ButtonState.Pressed && sharkPosition.X > 0)
            {
                sharkPosition.X -= 5;
            }

        }

        public void Draw(SpriteBatch theSpriteBatch)
        {
            theSpriteBatch.Draw(shark1, sharkPosition, Color.White);

        }


    }
}
