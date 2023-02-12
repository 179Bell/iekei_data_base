import { Flex, Box, Spacer } from '@chakra-ui/react';
import { Logo } from '@/components/atoms/Logo';
import { LinkButton } from '../atoms/LinkButton';

export const Header = () => {
  return (
    <Box px={4} bgColor="#AF011C">
      <Flex h={{ sm: '40px', md: '60px' }} align="center" justifyContent="space-between">
        <Logo />
        <Spacer />
        <LinkButton size="md" textColor="white" mr="2" variant="ghost" _hover={{ opacity: '0.6' }}>
          ログイン
        </LinkButton>
        <LinkButton
          size="md"
          textColor="white"
          mr="2"
          variant="outline"
          _hover={{ bgColor: 'white', color: '#AF011C' }}
        >
          新規登録
        </LinkButton>
      </Flex>
    </Box>
  );
};
