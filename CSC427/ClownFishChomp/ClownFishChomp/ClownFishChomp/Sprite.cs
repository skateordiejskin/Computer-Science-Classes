using System;
using System.Collections.Generic;
using Microsoft.Xna.Framework;
using Microsoft.Xna.Framework.Audio;
using Microsoft.Xna.Framework.Content;
using Microsoft.Xna.Framework.Graphics;
using Microsoft.Xna.Framework.Input;
using Microsoft.Xna.Framework.Storage;

namespace ClownFishChomp
{
    class Sprite{

        public string AssetName;
        public Vector2 Position = new Vector2(0, 0);
        private Texture2D clownFishTexture;
        public Rectangle Size;
        private float mScale = 1.0f;
       
        public void LoadContent(ContentManager theContentManager, string theAssetName){
            clownFishTexture = theContentManager.Load<Texture2D>(theAssetName);
            AssetName = theAssetName;
            Size = new Rectangle(0, 0, (int)(clownFishTexture.Width * Scale), (int)(clownFishTexture.Height * Scale));
        }

        public void Draw(SpriteBatch theSpriteBatch){
            theSpriteBatch.Draw(clownFishTexture, Position,
               new Rectangle(0, 0, clownFishTexture.Width, clownFishTexture.Height),
               Color.White, 0.0f, Vector2.Zero, Scale, SpriteEffects.None, 0);
        }

        //When the scale is modified through the property, the size of the sprite is recalculated with the new scale applied
        
        public float Scale{
            get { return mScale; }
            set{
                mScale = value;
                //Recalculate the size of the sprite with the new scale
                Size = new Rectangle(0, 0, (int)(clownFishTexture.Width * Scale), (int)(clownFishTexture.Height * Scale));
            }

        }

        public void Update(GameTime theGameTime, Vector2 theSpeed, Vector2 theDirection){
            Position += theDirection * theSpeed * (float)theGameTime.ElapsedGameTime.TotalSeconds;
        }
    }
}