import { Button as ChakraButton, ButtonProps } from '@chakra-ui/react';
import Link, { LinkProps } from 'next/link';

interface Props extends ButtonProps {
  href?: string;
  linkProps?: LinkProps;
}

export const Button = ({ children, href, ...rest }: Props) => {
  if (href) {
    return (
      <ChakraButton as={Link} href={href} {...rest}>
        {children}
      </ChakraButton>
    );
  }

  return <ChakraButton {...rest}>{children}</ChakraButton>;
};
