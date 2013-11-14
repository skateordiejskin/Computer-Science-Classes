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
    class clownfish
    {
        public Texture2D clownfish1;
        public Vector2 clownfishPosition;
        public Rectangle clownfishBR;
        

        public void LoadContent(ContentManager theContentManager)
        {
            clownfish1 = theContentManager.Load<Texture2D>("clownfish");
            clownfishPosition = new Vector2(400, 100);
            clownfishBR = new Rectangle((int)clownfishPosition.X, (int)clownfishPosition.Y,
                                  clownfish1.Width, clownfish1.Height);

        }

        public void Update(GameTime gameTime)
        {
            KeyboardState keyboardState = Keyboard.GetState();

            clownfishBR.X = (int)clownfishPosition.X;
            clownfishBR.Y = (int)clownfishPosition.Y;

            //clownfish movements
            if (keyboardState.IsKeyDown(Keys.Up) && clownfishPosition.Y > 0)
            {
                clownfishPosition.Y -= 5;
            }
            if (keyboardState.IsKeyDown(Keys.Down) && clownfishPosition.Y < (540 - clownfish1.Height))
            {
                clownfishPosition.Y += 5;
            }
            if (keyboardState.IsKeyDown(Keys.Right) && clownfishPosition.X < (720 - clownfish1.Width))
            {
                clownfishPosition.X += 5;
            }
            if (keyboardState.IsKeyDown(Keys.Left) && clownfishPosition.X > 0)
            {
                clownfishPosition.X -= 5;
            }

            if (GamePad.GetState(PlayerIndex.One).Buttons.Y == ButtonState.Pressed && clownfishPosition.Y > 0)
            {
                clownfishPosition.Y -= 5;
            }
            if (GamePad.GetState(PlayerIndex.One).Buttons.A == ButtonState.Pressed && clownfishPosition.Y < (540 - clownfish1.Height))
            {
                clownfishPosition.Y += 5;
            }
            if (GamePad.GetState(PlayerIndex.One).Buttons.B == ButtonState.Pressed && clownfishPosition.X < (720 - clownfish1.Width))
            {
                clownfishPosition.X += 5;
            }
            if (GamePad.GetState(PlayerIndex.One).Buttons.X == ButtonState.Pressed && clownfishPosition.X > 0)
            {
                clownfishPosition.X -= 5;
            }

        }

        public void Draw(SpriteBatch spriteBatch)
        {
            spriteBatch.Draw(clownfish1, clownfishPosition, Color.White);
        }
    }
}
