using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0704
{
    class Cat : IPredator, IPrey
    {
        // Properties
        public int AttackSpeed { get; set; }
        public int FleeSpeed { get; set; }

        // Constructor
        public Cat(int attackSpeed, int fleeSpeed)
        {
            this.AttackSpeed = attackSpeed;
            this.FleeSpeed = fleeSpeed;
        }

        // Methods
        public void Attack(IPrey prey)
        {
            Console.WriteLine($"{this.GetType().Name} trying to catch {prey.GetType().Name} ");
            // Attack attempt
            if (this.AttackSpeed > prey.FleeSpeed)
            {
                Console.WriteLine($"{this.GetType().Name} catched {prey.GetType().Name}");
            }
            else
            {
                prey.Flee();
            }
        }

        public void Flee()
        {
            Console.WriteLine($"{this.GetType().Name} escaped succesfully.");
        }
    }
}
