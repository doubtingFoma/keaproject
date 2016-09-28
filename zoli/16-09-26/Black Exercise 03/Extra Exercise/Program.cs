using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace C
{
    class Program
    {
        static void Main(string[] args)
        {
            //The size of the board
            int boardSize = 8;
            
            //This is a 2 dimensional array (it could've been done with arrays in arrays, but this is simpler right now)
            //The string type contains the black and white words, according to the field's color
            //the size of the 2 dimensions is the same, since it's a square chessboard
            string[,] chessBoard = new string[boardSize, boardSize];
            
            //we iterate through the first dimension of the array, which is the row of the board
            for (int i = 0; i < chessBoard.GetLength(0); i++)
            {
                //in every row, we iterate through the second dimension, the column
                for (int j = 0; j < chessBoard.GetLength(1); j++)
                {
                    //the chessboard is designed, that every second field is the same color,
                    //so if the modulus is the same in the row and the column, the color is black, otherwise white
                    if (j % 2 == i % 2) 
                    {
                        //write the word black into the current position
                        chessBoard[i, j] = "black";
                    } else
                    {
                        //write the word white into the current position
                        chessBoard[i, j] = "white";
                    }
                 //   Console.Write($"{chessBoard[i, j]} ");

                }             
            }

            //---------------------------------------------------------------------------//
            //---------------------------------------------------------------------------//

            //From here, I drew a complete chessboard, with the correct layout (A1 is in the bottom left corner, H8 is in the top right
            //Both A1 and H8 must be black!!

            //nice little title
            Console.WriteLine("This is a chessboard:");
            Console.WriteLine();

            //write the column numbers to the top of the board
            WriteColNumbers(chessBoard);

            //The top border of the board
            Console.WriteLine("   ----------------------------------------------------------");
            
            //We start from the end of the rows, to make the last element appear as the top one in the console
            //Basically H1 will be the top left field (the first one we write to the console).
            for (int i = chessBoard.GetLength(0)-1; i >= 0; i--)
            {
                //nice little left border
                Console.Write($"{i+1} | ");

                //From here, we use a regular for loop to write the columns in order
                for (int j = 0; j < chessBoard.GetLength(1); j++)
                {
                    //maybe I don't have to explain an if statement
                    if (chessBoard[i, j] == "white")
                    {
                        //When the field is white, we write with black letters, on a white background 
                        //to make the board look more like a chessboard
                        Console.BackgroundColor = ConsoleColor.White;
                        Console.ForegroundColor = ConsoleColor.Black;
                    }
                    //write the color of the field in the console
                    Console.Write($" {chessBoard[i, j]} ");
                    //reset the color (it always resets to black background and white letters) so we can write the next field
                    Console.ResetColor();
                }
                //nice little right border
                Console.Write($" | {i+1}");
                //make sure we write the next row in a new line
                Console.WriteLine("");
            }
            //nice little bottom border
            Console.WriteLine("   ----------------------------------------------------------");
            
            //write the column numbers to the bottom of the board
            WriteColNumbers(chessBoard);

            //an extra line for better readability
            Console.WriteLine();

            //---------------------------------------------------------------------------//
            //---------------------------------------------------------------------------//


            int RowNumber, ColNumber;

            //I won't explain this
            Console.Write("Please enter the coordinate for the row (1-8): ");
            //until we get an integer that is between 1 and 8, we write an error message and ask it again
            while ( !Int32.TryParse(Console.ReadLine(), out RowNumber) || RowNumber < 1 || RowNumber > 8  )
            {                
                Console.Write("Error! Please enter a VALID coordinate for the row (1-8): ");
            }


            Console.Write("Please enter the coordinate for the column (1-8): ");
            //until we get an integer that is between 1 and 8, we write an error message and ask it again
            while (!Int32.TryParse(Console.ReadLine(), out ColNumber) || ColNumber < 1 || ColNumber > 8)
            {
                Console.Write("Error! Please enter a VALID coordinate for the column (1-8): ");
            }

            //The reason why we had to do everything above this.
            Console.WriteLine($"The color of the field {RowNumber}:{ColNumber} is {chessBoard[RowNumber-1, ColNumber-1]}.");

            //Prevent auto exit in debug mode (yes, i work in debug mode, it's easier to press F5 instead of CTRL+F5 every single time....)
            Console.ReadKey();
        }

        //this is a small function that writes the column numbers in the console
        static void WriteColNumbers(string[,] chessBoard)
        {
            Console.Write("    ");
            for (int i = 0; i < chessBoard.GetLength(1); i++)
            {
                Console.Write($"   {i + 1}   ");
            }
            Console.WriteLine();
        }
    }
}