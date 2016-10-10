using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0504
{
    class Program
    {
        static void Main(string[] args)
        {
            Box myBox = new Box();
            myBox.Width = 5;
            myBox.Length = 6;
            myBox.Height = 7;
            Console.WriteLine($"The volume of the box is: {myBox.Volume} and the surface is: {myBox.Surface}" );
        }
    }
}
