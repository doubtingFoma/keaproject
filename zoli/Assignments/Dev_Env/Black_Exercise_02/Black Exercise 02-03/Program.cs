using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_02_03
{
    class Program
    {
        static void Main(string[] args)
        {
            
            Console.Write("You can write 'Help', 'Exit' or anything else here: ");

            //We call the function that handles everything
            InputAction(Console.ReadLine());

            Console.ReadKey();
        }
        //This function is neccessary if you want to make the program reusable. it only exits if you type "Exit" in the console, otherwise just works again
        static void InputAction(string input)
        {
            //we create a lowercase value of the input to handle switch statements case insensitive
            string LowerInput = input.ToLower();

            switch (LowerInput)
            {
                case "help":
                    Console.WriteLine("'Help' shows you what you can write, 'Exit' terminates the program. Anything else will display the input text in vertical form.");
                    Console.Write("Input: ");
                    //We call the function again, to "start the program again".
                    InputAction(Console.ReadLine());
                    break;
                case "exit":
                    Console.WriteLine("Good bye :) ");
                    //we don't call the function this time to let the program run and reach its end to exit
                    break;
                default:
                    for (int i = 0; i < input.Length; i++)
                    {
                        //write the characters of the input separately in a line
                        Console.WriteLine(input[i]);
                    }
                    Console.WriteLine("-------");
                    Console.Write("Input: ");
                    InputAction(Console.ReadLine());
                    break;

            }
        }

    }
}
