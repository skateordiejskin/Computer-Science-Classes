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
    /// <summary>
    /// This is the main type for your game
    /// </summary>
    public class Game1 : Microsoft.Xna.Framework.Game
    {
        GraphicsDeviceManager graphics;
        SpriteBatch spriteBatch;

        Texture2D mControllerDetectScreenBackground;
        Texture2D mTitleScreenBackground;
        Texture2D player2;
        Song jaws;
        public int movement = 0;

        clownfish mClownfish;
        shark mShark;

        public enum GameState
        {
            menu,
            play,
            player2Wins,
            player1Wins,
            gameOver,
        };
        GameState gameState;
        public Game1()
        {
            graphics = new GraphicsDeviceManager(this);
            Content.RootDirectory = "Content";


            this.graphics.PreferredBackBufferWidth = 720;
            this.graphics.PreferredBackBufferHeight = 540;
        }



        /// <summary>
        /// Allows the game to perform any initialization it needs to before starting to run.
        /// This is where it can query for any required services and load any non-graphic
        /// related content.  Calling base.Initialize will enumerate through any components
        /// and initialize them as well.
        /// </summary>
        protected override void Initialize()
        {
            // TODO: Add your initialization logic here
            gameState = GameState.menu;
            base.Initialize();
        }

        /// <summary>
        /// LoadContent will be called once per game and is the place to load
        /// all of your content.
        /// </summary>

        protected override void LoadContent()
        {

            //Create a new SpriteBatch, which can be used to draw textures.
            spriteBatch = new SpriteBatch(GraphicsDevice);

            jaws = Content.Load<Song>("jaws");
            MediaPlayer.Play(jaws);
            MediaPlayer.IsRepeating = true;
            mControllerDetectScreenBackground = Content.Load<Texture2D>("background");
            mTitleScreenBackground = Content.Load<Texture2D>("start");
            player2 = Content.Load<Texture2D>("player2");


            // TODO: use this.Content to load your game content here

            mClownfish = new clownfish();
            mClownfish.LoadContent(this.Content);

            mShark = new shark();
            mShark.LoadContent(this.Content);

        }

        /// <summary>
        /// UnloadContent will be called once per game and is the place to unload
        /// all content.
        /// </summary>
        /// 

        protected override void UnloadContent()
        {
            // TODO: Unload any non ContentManager content here
        }

        /// <summary>
        /// Allows the game to run logic such as updating the world,
        /// checking for collisions, gathering input, and playing audio.
        /// </summary>
        /// <param name="gameTime">Provides a snapshot of timing values.</param>


        protected override void Update(GameTime gameTime)
        {
            // Allows the game to exit
            if (GamePad.GetState(PlayerIndex.One).Buttons.Back == ButtonState.Pressed)
                this.Exit();
            if (Keyboard.GetState().IsKeyDown(Keys.Back) == true)
                this.Exit();

            // TODO: Add your update logic here
            switch (gameState)
            {
                case GameState.menu:
                    if (GamePad.GetState(PlayerIndex.One).Buttons.Start == ButtonState.Pressed || Keyboard.GetState().IsKeyDown(Keys.Enter) == true)
                        gameState = GameState.play;
                    break;

                case GameState.play:
                    mClownfish.Update(gameTime);
                        mShark.Update(gameTime);

                        if (movement >= 280)
                            gameState = GameState.player1Wins;
                        movement++;
                    break;

                case GameState.player2Wins:
                    break;

                case GameState.player1Wins:
   
                    break;
                
            }

            base.Update(gameTime);
        }



        /// <summary>
        /// This is called when the game should draw itself.
        /// </summary>
        /// <param name="gameTime">Provides a snapshot of timing values.</param>




        protected override void Draw(GameTime gameTime)
        {
            GraphicsDevice.Clear(Color.CornflowerBlue);

            // TODO: Add your drawing code here
            spriteBatch.Begin();

            switch (gameState)
            {
                case GameState.menu:
                    movement = 0;
                    spriteBatch.Draw(mTitleScreenBackground, Vector2.Zero, Color.White);
                    break;

                case GameState.play:
                    spriteBatch.Draw(mControllerDetectScreenBackground, Vector2.Zero, Color.White);
                      mClownfish.Draw(spriteBatch);
                    mShark.Draw(spriteBatch);
                    if (mClownfish.clownfishBR.Intersects(mShark.sharkBR))
                    {
                        GamePad.SetVibration(PlayerIndex.Two, 0.5f, 0.5f);
                        gameState = GameState.player2Wins;
                    }
                
                   
                    break;

                case GameState.player2Wins:
                    GamePad.SetVibration(PlayerIndex.Two, 0.5f, 0.5f);
                    spriteBatch.Draw(player2, Vector2.Zero, Color.White);
                    break;

                case GameState.player1Wins:
                    GamePad.SetVibration(PlayerIndex.One, 0.5f, 0.5f);
                    gameState = GameState.menu;
                      break;

            }

            spriteBatch.End();

            base.Draw(gameTime);
        }
    }

}